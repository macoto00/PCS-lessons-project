class Repository 
{
    constructor(tableName)
    {
        this.Async = new this.Async();
        this.TableName = tableName;
    }

    create(formdata)
    {
        formdata.append("operation_type", "create");
        return this.#runAsync(formdata);
    }

    retrieve(formdata)
    {
        formdata.append("operation_type", "retrieve");
        return this.#runAsync(formdata);    }

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
        return this.Async.performOperation(formdata, formdata, this.#formatDestination(this.TableName));
    }

    #formatDestination(str)
    {
        var loweredStr = str.toLowerCase();
        var capitalizedFirstStr = this.#capitalizedFirstLetter(loweredStr);
        var singularStr = capitalizedFirstStr.replace(/s{1}$/, '');
        return `./endpoints/${singularStr}Endpoint.php`;
    }

    #capitalizedFirstLetter(str)
    {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
}