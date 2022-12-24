<ul class="d-flex justify-content-betweens">
    <li>
        <a href="{{route($route.'.show',[$route => $entity])}}">
            Visualizza
        </a>
    </li>
    <li>
        <a href="{{route($route.'.edit',[$route => $entity])}}">
            Modifica
        </a>
    </li>
    <li>
        <a href="{{route($route.'.confirm_delete',[$route => $entity])}}">
            <img src="/assets/images/icon/trash-2.svg" alt="trash-2">
        </a>
    </li>
</ul>
