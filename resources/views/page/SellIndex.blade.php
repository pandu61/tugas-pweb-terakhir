<div class="main-sell-index col-lg-10">
        <!-- Page Heading -->
     <br><br>
     <table style="width: 100%;" style="margin-top: 3vw;" class="bor">
        <tr class="bor">
            <th class="bor">Item Name</th>
            <th class="bor">Buyer name</th>
            <th class="bor">buyer address</th>
            <th class="bor">purchase date   </th>
        </tr>
       @forelse ($items as $item)
       <tr class="bor">
        <td class="bor">{{$item->product_name}}</td>
        <td class="bor"><img src="/img/sepeda.jpg" style="max-width: 10vw;" height="auto"></td>
        <td> class="bor"$ {{$item->price}} </td>
        <form action="{{route('sell.edit', $item->id)}}" method="GET">
            @csrf
            <td class="bor">
                <center>
                    <button type="submit" style="padding: 10px; padding-left: 20px; padding-right: 20px;" class="btn btn-primary txt">Edit</button>
                </center>
            </td class="bor">
        </form>
        <td>
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


</div>

    </div>
</div>
