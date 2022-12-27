<ul class="d-flex justify-content-betweens">
    <li>
        <a href="{{route($route.'.show',[$route => $entity])}}">
            Visualizza
        </a>
    </li>
    <li>
        <a href="{{route($route.'.edit',[$route => $entity])}}">
            <svg width="54" height="53" viewBox="0 0 54 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M35 8.5L40.9862 2.51379C41.6273 1.87265 42.5282 1.54666 43.4248 1.68146C50.1818 2.69733 51.4879 5.34754 52.2903 10.1419C52.4342 11.0013 52.172 11.8785 51.6013 12.537L46 19M35 8.5L46 19M35 8.5L7.5 36M46 19L18 47M7.5 36H11.5V41H18V47M7.5 36L2.18281 48.9132C1.52781 50.5039 3.05352 52.1245 4.68081 51.5666L18 47" stroke="#627184" stroke-width="2" stroke-linecap="round"/>
            </svg>

        </a>
    </li>
    <li>
        <a href="{{route($route.'.confirm_delete',[$route => $entity])}}">
            <img src="/assets/images/icon/trash-2.svg" alt="trash-2">
        </a>
    </li>
</ul>
