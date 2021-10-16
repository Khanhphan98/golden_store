// This is included with the Parsley library itself,
// thus there is no use in adding it to your project.

Parsley.addMessages('vi', {
  defaultMessage: "Giá trị không hợp lệ.",
  type: {
    email:        "Định dạng email không đúng.",
    url:          "Định dạng url không đúng.",
    number:       "Không đúng định dạng kiểu số.",
    integer:      "Không đúng định dạng kiểu số.",
    digits:       "Chỉ cho phép chữ số",
    alphanum:     "Chỉ cho phép kiểu chữ số."
  },
  notblank:       "Giá trị không được để trống.",
  required:       "Trường này không được bỏ trống.",
  pattern:        "Mật khẩu không đúng định dạng.",
  min:            "Giá trị phải lớn hơn hoặc bằng %s.",
  max:            "Giá trị phải nhỏ hơn hoặc bằng %s.",
  range:          "Giá trị phải nằm trong khoảng %s đến %s.",
  minlength:      "Độ dài quá nhỏ. Phải có ít nhất %s ký tự.",
  maxlength:      "Đọ dài quá lơn. Chỉ cho phép %s ký tự.",
  length:         "This value length is invalid. It should be between %s and %s characters long.",
  mincheck:       "Phải chọn ít nhất %s giá trị.",
  maxcheck:       "Chỉ được chọn nhiều nhất %s giá trị.",
  check:          "You must select between %s and %s choices.",
  equalto:        "Mật khẩu không khớp."
});

Parsley.setLocale('vi');
