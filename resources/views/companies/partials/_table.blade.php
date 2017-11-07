<table class="table table-striped table-hover">
  @foreach($data as $dt)
  <tbody>
    <tr>
      <th scope="row">Razon social</th>
      <td> {{ $dt->business_name }} </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
  @endforeach
</table>
