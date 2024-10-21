const mapValuesToFields = (values) => {
    Object.entries(values).map(([fieldName, value]) => {
        if (value && fieldName !== 'id') {
            const input = document.getElementById(fieldName);
            input.value = value;
        }
    })
}