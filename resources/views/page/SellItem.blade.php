<div class="col-lg-10">
    <br><br>
    <a href="{{route('sell.create')}}" class="btn btn-block btn-join-now  mt-3 my-2 container " id="runjaw " style="
    background-color: #ff9e53;
    color: #ffffff;
    max-width: 1000px !important;
    border-radius: 0px;
   margin-top: -1px !important;


    z-index: 999999;
     ">Inser New Item</a>
     <br>
     <table style="width: 100%;" class="bor">
        <tr  class="bor">
            <th  class="bor">Item Name</th>
            <th  class="bor">Picture</th>
            <th  class="bor">Price</th>
            <th  class="bor"></th>
            <th  class="bor"></th>
        </tr>
       @forelse ($items as $item)
       <tr  class="bor">
        <td  class="bor">{{$item->product_name}}</td>
        <td  class="bor"><img src="/img/sepeda.jpg" style="max-width: 10vw;" height="auto"></td>
        <td  class="bor">$ {{$item->price}} </td>
        <form action="{{route('sell.edit', $item->id)}}" method="GET">
            @csrf
            <td  class="bor">
                <center>
                    <button type="submit" style="padding: 10px; padding-left: 20px; padding-right: 20px;" class="btn btn-primary txt">Edit</button>
                </center>
            </td>
        </form>
        <td  class="bor">
           <form action="{{route('sell.destroy', $item->id)}}"
            method="POST">
            @csrf
            @method('delete')
            <center>
                <button style="padding: 10px;"
                class="btn btn-danger txt">delete</button>
            </center>
           </form>
        </td>
    </tr>
        @empty
             <tr>
             <td clospan="7" class="text-center">
            Data Kosong
             </td>
         </tr>
       @endforelse
     </table>
</div>
</div>
