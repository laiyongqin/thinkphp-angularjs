    
    function initPage(id, total, num, back, cpage) {
        var _currentPage = parseInt(cpage);
        var prev = _currentPage - 1;
        var next = _currentPage + 1;
        var totalpage = Math.ceil(total / num);
        var pageStr = '';
        var start = _currentPage < 5 ? 1 : _currentPage - 4;
        var end = (_currentPage + 5) > totalpage ? totalpage : _currentPage + 4;

        var prevStr = _currentPage != 1 ? '<li onclick="' + back + '(' + prev + ')"><a href="javascript:void(0);" aria-label="Previous"><span aria-hidden="true">«</span></a></li>' : '';
        var nextStr = _currentPage < totalpage ? '<li onclick="' + back + '(' + next + ')"><a href="javascript:void(0);" aria-label="Next"><span aria-hidden="true">»</span></a></li>' : '';

        for (i = start; i <= end; i++) {
            if (i == _currentPage) {
                pageStr += '<li class="active" onclick="' + back + '(' + i + ')"><a href="javascript:void(0);">' + i + '</a></li>';
            } else {
                pageStr += '<li onclick="' + back + '(' + i + ')"><a href="javascript:void(0);">' + i + '</a></li>';
            }
        }

        pageStr += nextStr;
        pageStr += end < totalpage ? '<li onclick="' + back + '(' + totalpage + ')"><a href="javascript:void(0);">尾页</a></li>' : '';
        var jump = '<li class="ml30">转到 <input id="gotoCurrent" type="text" class="form-control winput4" value="1"> 页 <input type="button" onclick="_jump(' + back + ',' + totalpage + ')" class="btn btn-primary" value="跳转"></li>';
        $(id).html(prevStr + pageStr + jump);

    }

    function _jump(back, total) {
        if ($("#gotoCurrent").val() <= total) {
            back($("#gotoCurrent").val());
        }
    }