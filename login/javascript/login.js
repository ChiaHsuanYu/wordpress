// 登入
function login() {
    var account = document.getElementById("account").value;
    var password = document.getElementById("password").value;
    var base_url = document.getElementById("base_url").value;
    var data_obj = {
        account: account,
        password: password,
    };
    var result = call_api('./api/login/', data_obj);
    document.getElementById("alertMsg").innerHTML = result['message'];
    if (result['status']) {
        sleep = new Promise((resolve) => setTimeout(resolve, 1000));
        sleep.then(() => {
            window.location.href = base_url; // 跳轉至首頁
        });
    }
}

// 登出
function logout() {
    var data_obj = {};
    var result = call_api('./api/logout/', data_obj);
    if (!result['status']) {
        alert(result['message']);
    }
}

// 呼叫API
function call_api(api_path, data_obj) {
    var result = [];
    $.ajax({
        cache: false,
        async: false,
        url: api_path,
        headers: {},
        type: "POST",
        data: data_obj,
        success: function(json) {
            result = json;
        },
        error: function(xhr, status, error) {
            result['status'] = 0;
            result['message'] = "連線失敗";
            console.log("Error    ==================    API Response    ==================");
            console.log(xhr.responseText);
            console.log(error);
        }
    });
    return result;
}