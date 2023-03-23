class ForgotValidator
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
        var password = formObject.querySelectorAll('[type="password"]')[0];
        var confirmedPassword = formObject.querySelectorAll('[type="password"]')[1];

        this.#validateRequired([email, password]);
        this.#validateEmail(email.value);
        this.#validatePassword(password.value);
        this.#validatePassword(confirmedPassword.value);
        this.#validatePasswordsMatch(password.value, confirmedPassword.value);

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

    #validatePasswordsMatch(password, confirmedPassword)
    {
        if(password !== confirmedPassword)
        {
            this.#messages.push("Passwords do not match.");
        }
    }
}