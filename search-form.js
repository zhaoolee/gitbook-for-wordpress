document.addEventListener("DOMContentLoaded", function () {
    var searchFields = document.querySelectorAll(".search-form .search-field");

    searchFields.forEach(function (searchField) {
        searchField.addEventListener("keypress", function (event) {
            handleKeyPress(event);
        });
    });

    function handleKeyPress(event) {
        const searchField = event.target;
        const searchForm = searchField.closest(".search-form");
        const searchTerm = searchField.value.trim();

        if (event.key === "Enter") {
            event.preventDefault(); // 阻止默认行为

            if (searchTerm.length > 0) { // 检查搜索框是否为空
                searchForm.submit(); // 提交表单
            }
        }
    }
});
