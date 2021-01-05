<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Registrac')
<img src="https://registrac.page/assets/img/registrac-logo.png" class="logo" alt="Registrac logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
