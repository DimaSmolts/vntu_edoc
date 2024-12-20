const initializeTextEditorWithoutToolbar = (inputElementId, isStylesAvailable = true) => {
	const Block = Quill.import('blots/block');

	class CustomParagraph extends Block {
		static create(value) {
			let node = super.create();
			node.setAttribute('class', 'indent inserted justify'); // Add your custom classes
			return node;
		}

		static formats(domNode) {
			return domNode.getAttribute('class'); // Ensure class persists
		}
	}

	CustomParagraph.blotName = 'customParagraph'; // Format name
	CustomParagraph.tagName = 'p'; // Tag to use

	// Register the custom blot
	Quill.register(CustomParagraph, true);

	// Initialize the text editor
	const editor = isStylesAvailable
		? new Quill(inputElementId, {
			theme: 'snow',
			modules: {
				toolbar: false, // Disable the toolbar
			},
			formats: ['bold', 'italic', 'customParagraph'],
		})
		: new Quill(inputElementId, {
			theme: 'snow',
			modules: {
				toolbar: false, // Disable the toolbar
			},
			formats: ['customParagraph'],
		});

	// Function to format all lines
	const formatAllLines = () => {
		const editorContent = editor.getContents();
		let currentIndex = 0;

		editorContent.ops.forEach((op) => {
			if (op.insert && typeof op.insert === 'string') {
				const lines = op.insert.split('\n');
				lines.forEach((line, lineIndex) => {
					if (line.trim() || lineIndex < lines.length - 1) {
						const [line] = editor.getLine(currentIndex) || [];
						if (line) {
							editor.formatLine(currentIndex, 1, 'customParagraph', true);
						}
					}
					currentIndex += line.length + 1;
				});
			}
		});
	};

	// Ensure customParagraph format applies to all new lines
	editor.on('text-change', (delta, oldDelta, source) => {
		if (source === 'user' || source === 'api') {
			let currentIndex = 0;

			delta.ops.forEach((op) => {
				if (op.insert && typeof op.insert === 'string') {
					const lines = op.insert.split('\n');
					lines.forEach((line, lineIndex) => {
						if (line.trim() || lineIndex < lines.length - 1) {
							const [line] = editor.getLine(currentIndex) || [];
							if (line) {
								editor.formatLine(currentIndex, 1, 'customParagraph', true);
							}
						}
						currentIndex += line.length + 1;
					});
				} else if (op.retain) {
					currentIndex += op.retain;
				}
			});
		}
	});

	// Detect paste events to reformat pasted content
	editor.root.addEventListener('paste', () => {
		// Use a slight delay to ensure Quill processes the pasted content first
		setTimeout(() => {
			formatAllLines();
		}, 0);
	});

	// Apply custom paragraph format to existing content on initialization
	formatAllLines();

	return editor;
};
