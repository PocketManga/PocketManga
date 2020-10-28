function changePage(baseUrl, Page) {
    var Option = document.getElementById("order-by").value;
    var Show = document.getElementById("show-per-page").value;
    
    var Url = baseUrl+'home_order-by='+Option+'_manga-per-page='+Show+'_page='+Page;
    document.location.href=Url;
}