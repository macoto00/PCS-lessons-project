class LoginValidator
{
    #messages = [];
    #emailValidator;
    #requiredValidator;
    #passwordValidator;
    
    constructor(emailValidator, requiredValidator, passwordValidator)
    {
        this.#emailValidator = emailValidator;
        this.#requiredValidator = requiredValidator;
        this.#passwordValidator = passwordValidator;
    }

    validate(formObject)
    {
        this.#messages = [];
        var email = formObject.querySelector('[type="email"]');
        var password = formObject.querySelector('[type="password"]');

        this.#validateRequired([email, password]);
        this.#validateEmail(email.value);
        this.#validatePassword(password.value);

        return this.#messages;
    }

    #validateRequired(elements)
    {
        var results = this.#requiredValidator.validate(elements);
        if(results.length !== 0)
        {
            this.#messages.push(`Following elements have empty values: ${results.join(', ')}`);
        }
    }

    #validateEmail(email)
    {
        if(!this.#emailValidator.validate(email))
        {
            this.#messages.push("Email has an inappropriate format.");
        }
    }

    #validatePassword(password)
    {
        var result = this.#passwordValidator.validate(password);
        if(result.lentgh !== 0)
        {
            result.forEach(message => {
                this.#messages.push(message);
            });
        }
    }
}