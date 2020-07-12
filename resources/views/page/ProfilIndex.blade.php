 <div class="main col-lg-10 col-sm-12">
        <center>
            <img src="{{Auth::user()->img_url}}"
            style=""class="profil-pict">
        <table>
          <tr>
              <th width:"500%">Name</th>
              <td width:"500%" text-right>{{Auth::user()->name}}</td>
          </tr>
          <tr>
              <th width:"50%">Email</th>
              <td width:"50%" text-right>{{Auth::user()->email}}</td>
          </tr>
        </table>
        <a href="{{url('/profil/edit')}}" class="btn btn-primary"
        style="margin-top : 20px;
        padding-left : 20px;
        padding-right : 20px;">Edit</a>
      </center>
    </div>
</div>
