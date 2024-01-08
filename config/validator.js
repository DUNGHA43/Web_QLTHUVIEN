function validator(options)
{
    var selectorRules = {};
    // hàm thực hiện validate
    function validate(inputElement, rule)
    {
        var errElement = inputElement.parentElement.querySelector(options.errorSelector);
        var errorMessage;
        // Lấy ra các rules của selector
        var rules = selectorRules[rule.Selector];

        // Lặp qua các rules để kiểm tra
        for(var i = 0 ; i < rules.length; ++i)
        {
            errorMessage = rules[i](inputElement.value);
            if (errorMessage) break ;
        }

        if(errorMessage)
        {
            errElement.innerText = errorMessage;
        }
        else
        {
            errElement.innerText = "";
        }
        return !errorMessage;
    }
    // lấy element của form
    var formElement = document.querySelector(options.form);
    if (formElement)
    {
        // Khi submit 
        formElement.onsubmit = function (e){
            var isFormValid = true;
            // Thực hiện lặp qua từng rule
            options.rules.forEach(function (rule) {
                var inputElement = formElement.querySelector(rule.Selector);
                var isValid = validate(inputElement, rule);
                if(!isValid)
                {
                    isFormValid = false;
                }

                if (isFormValid)
                {
                    console.log("không lỗi");
                }
                else
                {
                    e.preventDefault();
                }
            });
        }
        // Lặp qua mỗi rules và xử lý
        options.rules.forEach(function (rule) {

            // Lưu lại các rules cho mỗi input
            if(Array.isArray(selectorRules[rule.Selector]))
            {
                selectorRules[rule.Selector].push(rule.test);
            }
            else
            {
                selectorRules[rule.Selector] = [rule.test];
            }
            
            var inputElement = formElement.querySelector(rule.Selector);
            
            if(inputElement)
            {
                // Xử lý khi blur khỏi input
                inputElement.onblur = function (){
                    validate(inputElement, rule);
                }

                // Xử lý khi oninput trên input
                inputElement.oninput = function (){
                    var errElement = inputElement.parentElement.querySelector(options.errorSelector);
                    errElement.innerText = "";
                }
            }
        });
    }
}

// Định nghĩa rules
// Note: Lỗi => return message : !Lỗi => undefined.
validator.isRequired = function (Selector){
    return{
        Selector: Selector,
        test: function (value) {
            return value.trim() ? undefined : "Vui lòng nhập vào trường này!";
        }
    }
}

validator.isEmail = function (Selector){
    return{
        Selector: Selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : "Định dạng email không đúng!";
        }
    }
}

validator.minLength = function (Selector , min){
    return{
        Selector: Selector,
        test: function (value) {
            return value.length >= min ? undefined : 'Vui lòng nhập tối thiểu ' + min + ' kí tự!';
        }
    }
}

validator.maxLength = function (Selector , max){
    return{
        Selector: Selector,
        test: function (value) {
            return value.length <= max ? undefined : 'Vui lòng nhập dưới ' + max + ' kí tự!';
        }
    }
}

validator.isComfirm = function (Selector, getComFirmValue, message){
    return{
        Selector: Selector,
        test: function (value) {
            return value === getComFirmValue() ? undefined : message;
        }
    }
}