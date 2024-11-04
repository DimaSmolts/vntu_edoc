const updateEDInfo = (event, blockName) => {
    const block = document.getElementById(blockName);
    const id = block.dataset.EDCId

    const postData = {
        id,
        field: event.target.name,
        value: event.target.value
    };

    updateED(postData);
}