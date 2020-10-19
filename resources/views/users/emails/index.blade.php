Dear {{Auth::user()->user_name}},
We receice your order from: Email {{ Auth::user()->email }},

Address {{ Auth::user()->address}},
<br/>
Phone {{ Auth::user()->phone}}, đã order sản phẩm.
<br/>
please, waiting admin to accept your order!
