<ul class="d-flex justify-content-betweens">
    <li>
        <a href="{{route($route.'.show',[$route => $entity])}}">
            <svg width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 11C11.0719 -1.35098 19.9353 -3.28082 29 11" stroke="#FFDA11" stroke-width="1.5"
                      stroke-linecap="round"/>
                <path d="M1 11C11.0719 20.8808 19.9353 22.4247 29 11" stroke="#FFDA11" stroke-width="1.5"
                      stroke-linecap="round"/>
                <ellipse cx="15.3793" cy="10.1622" rx="3.37931" ry="4.16216" fill="#FFDA11"/>
                <ellipse cx="15.3793" cy="10.1622" rx="1.93103" ry="2.37838" fill="white"/>
            </svg>

        </a>
    </li>
    <li>
        <a href="{{route($route.'.edit',[$route => $entity])}}">
            <svg width="24" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M15.9231 4.26214L18.1374 2.02635C18.7797 1.37775 19.6909 1.0264 20.5811 1.22814C22.7354 1.71631 23.4075 2.70584 23.7679 4.31851C23.9565 5.16267 23.6769 6.03667 23.1135 6.69303L21 9.15534M15.9231 4.26214L21 9.15534M15.9231 4.26214L3.23077 17.0777M21 9.15534L8.07692 22.2039M3.23077 17.0777H5.07692V19.4078H8.07692V22.2039M3.23077 17.0777L0.83401 22.9549C0.509285 23.7512 1.27449 24.5588 2.08711 24.2775L8.07692 22.2039"
                    stroke="#7F98FD" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        </a>
    </li>
    <li>
        <a href="{{route($route.'.confirm_delete',[$route => $entity])}}">
            <img src="/assets/images/icon/trash-2.svg" alt="trash-2">
        </a>
    </li>
</ul>
