function changePage(baseUrl, Page, PageNum) {
    var Option = document.getElementById("order-by").value;
    var Show = document.getElementById("show-per-page").value;
    
    var Url = baseUrl+Page+'_order-by='+Option+'_manga-per-page='+Show+'_page='+PageNum;
    document.location.href=Url;
}