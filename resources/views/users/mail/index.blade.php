Dear admin,
You have a new order from: Email {{ Auth::user()->email }},
<br/>
Name {{ Auth::user()->user_name }},
<br/>
Address {{ Auth::user()->address}},
<br/>
Phone {{ Auth::user()->phone}}, đã order sản phẩm.
<br/>
Please, visit recipe website with admin role to check the order
<br/>
Link http://localhost:8080/admin/login
<img src="/user_layouts/img/banner-1.jpg"/>
