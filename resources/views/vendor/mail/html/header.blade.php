@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block">
            @if (trim($slot) === 'Laravel')
            <img
                src="https://sekkiseiblue.com.my/images/logo2.png"
                style="
                    margin-top: 30px;
                    width: 200px;
                    height: 35px;
                    object-fit: contain;
                "
                class="logo"
                alt="Laravel Logo"
            />
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
