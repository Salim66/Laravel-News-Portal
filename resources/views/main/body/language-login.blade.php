<div class="col-lg-6">
    <ul class="top-header-others">

       <li>
          <div class="languages-list">
           @if(session()->get('lang') == 'bangla')
           <a href="{{ route('lang.english') }}">English</a>
           @else
           <a href="{{ route('lang.bangla') }}">বাংলা</a>
           @endif
          </div>
       </li>
       <li>
          <i class='bx bx-user'></i>
          <a href="login.html">Login</a>
       </li>
    </ul>
</div>
