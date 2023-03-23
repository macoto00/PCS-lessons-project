class RequiredValidator
{
    validate(elements)
    {
        var results = [];
        elements.forEach((element) => {
            if(element.value.length === 0)
            {
                results.push(element.name);
            }
        });

        return results;
    }
}