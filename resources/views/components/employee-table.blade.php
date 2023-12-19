@props(['employee'])
<tr>
    <td>{{ $employee['id'] }}</td>
    <td>
        <a href="/employees/{{ $employee['id'] }}">{{ $employee['name'] }}</a>
    </td>
    <td>
        <span>{{ $employee['type'] }}</span>
    </td>
    <!-- Add more cells with data as needed -->
    <td>
        <a href="/employees/{{ $employee['id'] }}"><i class="fas fa-fw fa-eye"></i></a>
        <a href=""><i class="fas fa-fw fa-pencil-alt"></i></a>
        <a href=""><i class="fas fa-fw fa-trash"></i></a>
    </td>
</tr>
