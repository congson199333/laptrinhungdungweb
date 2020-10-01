<form action="{{route('postForm')}}" method="post" >
	  {{ csrf_field() }}
	<table>
		<tr>
			<th>Nơi đi</th>
			<th>Nơi đến</th>
		</tr>
		<tr>
			<td>
				<input type="text" name="NoiDi" list="NoiDi" id="getNoiDi" placeholder="Khởi hành"/>
			</td>
			<td>
				<input type="text" name="NoiDen" list="NoiDen" id="getNoiDen" placeholder="Tất cả các điểm đến">
			</td>
			<tr>
				<td>
					<datalist id="NoiDi">
						 @foreach($noidip as $nd)
							<option value="{{$nd->MaSanBay}}"> {{$nd->TenSanBay}} </option>
						@endforeach 
					</datalist>
				</td>
			</tr>


		</tr>
	</table>
</form>