function expandClick(object)
{
    if(object.getAttribute("data-open") == "0")
    {
        object.setAttribute("data-open", "1");
    }
    else
    {
        object.setAttribute("data-open","0");
    }
}

function prepareDateForDisplaying(date)
{
    return `${date.getMonth() + 1}/${date.getDate()}/${date.getFullYear()}`;
}

function prepareDateForDatabase(date)
{
    return `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
}

function expandAccount(object)
{
    if(object.hasAttribute("data-open"))
    {
        object.removeAttribute("data-open");
        object.parentNode.removeAttribute("data-open");
        object.parentNode.parentNode.getElementsByClassName("header-right-resp")[0].removeAttribute("data-open");
    }
    else
    {
        object.setAttribute("data-open", "true");
        object.parentNode.setAttribute("data-open", "true");
        object.parentNode.parentNode.getElementsByClassName("header-right-resp")[0].setAttribute("data-open", "true");
    
    }
}