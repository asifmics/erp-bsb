<ul>
    @foreach ($group->childGroup as $child_group)
    <li>
        @for ($i = 0; $i < $count; $i++)
            &nbsp;
        @endfor
            <b>{{$child_group->name}}</b> 
            <ul>
                @foreach ($child_group->glAccounts as $glAccount)
                    <li>
                        @for ($i = 0; $i < $count; $i++)
                            &nbsp;&nbsp;
                        @endfor
                        {{$glAccount->code . ' - ' .$glAccount->name}}
                    </li>
                @endforeach
            </ul>
        @include('admin.accounts.partials.account', ['group' => $child_group, 'count'=> $count + 3])
    </li>
    @endforeach
</ul>