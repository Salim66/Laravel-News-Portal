<div class="col-lg-6">
    <ul class="top-header-others">

       <li>
          <div class="languages-list">
           @if(session()->get('lang') == 'english')
           <a href="{{ route('lang.bangla') }}">বাংলা</a>
           @else
           <a href="{{ route('lang.english') }}">English</a>
           @endif
          </div>
       </li>
       <li>
          <i class='bx bx-user'></i>
          <a href="{{ route('login') }}">Login</a>
       </li>
    </ul>
</div>
