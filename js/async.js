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
            async: false, 
            success: function(response)
            {
                res = response;
            }
        });

        return res;
    }
}