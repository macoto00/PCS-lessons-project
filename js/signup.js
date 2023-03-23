function validate(form, event)
{
    var emailValidator = new EmailValidator();
    var passwordValidator = new PasswordValidator();
    var requiredValidator = new RequiredValidator();
    var validator = new SignupValidator(emailValidator, requiredValidator, passwordValidator);
    var result = validator.validate(form);
    if(result.length !== 0)
    {
        event.preventDefault();
        window.alert(`Following errors occurred when sending the form's information:\n - ${result.join('\n- ')}`);
    }
}