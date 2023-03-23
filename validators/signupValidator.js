class SignupValidator
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
        var passwords = formObject.querySelectorAll('[type="password"]');
        var names = formObject.querySelectorAll('[type="text"]');

        this.#validateRequired([email, passwords[0], passwords[1], names[0], names[1]]);
        this.#validateEmail(email.value);
        this.#validatePassword(passwords[0].value);
        this.#validateConfirmPassword(passwords[0].value, passwords[1].value);
        names.forEach((name) => {
            this.#validateName(name.value);
        });

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

    #validateConfirmPassword(password, confirmPassword)
    {
        if(confirmPassword !== password)
        {
            this.#messages.push("Passwords do not match.");
        }
    }

    #validateName(name)
    {
        if(!name.match(/[a-zA-Z]+$/))
        {
            this.#messages.push("Field contains numbers and/or special characters. Only letters are allowed;")
        }
    }
}