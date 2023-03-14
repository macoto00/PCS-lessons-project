function prepareDateForDatabase(date)
{
    return `${date.getFullYear()}-${date.getMonth()}-${date.getDate()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`
}

function prepareDateForDisplaying(date)
{
    return `${date.getMonth() + 1}/${date.getDate()}${date.getFullYear()}`;
}