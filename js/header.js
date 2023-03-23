function headerClick(object)
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