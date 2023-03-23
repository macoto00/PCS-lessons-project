class Async
{
    performOperation(formdata, destination)
    {
        var res;
        $.ajax({
            url: destination,
            method: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            async: false, // hodnota false je nutna pro moznost vraceni hodnoty response z metody
            success: function(response)
            {
                res = response;
            }
        })
        return res;
    }
}