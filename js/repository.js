class Repository
{
    constructor(tableName)
    {
        this.async = new Async();
        this.tableName = tableName;
    }

    create(formdata)
    {
        formdata.append("operation_type", "create");
        return this.#runAsync(formdata);
    }

    retrieve(formdata)
    {
        formdata.append("operation_type", "retrieve");
        return this.#runAsync(formdata);
    }

    update(formdata)
    {
        formdata.append("operation_type", "update");
        this.#runAsync(formdata);
    }

    delete(formdata)
    {
        formdata.append("operation_type", "delete");
        this.#runAsync(formdata);
    }

    #runAsync(formdata)
    {
        return this.async.performOperation(formdata, this.#formatDestination(this.tableName));
    }

    #formatDestination(str)
    {
        var loweredStr = str.toLowerCase(str);
        var capitalizedFirstStr = this.#capitalizeFirstLetter(loweredStr);
        var singularStr = capitalizedFirstStr.replace(/s{1}$/, '');
        return `./endpoints/${singularStr}EndPoint.php`;
    }

    #capitalizeFirstLetter(str)
    {
        return str.charAt(0).toUpperCase() + str.slice(1);
    } 
}