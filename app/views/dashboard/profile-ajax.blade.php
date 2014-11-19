<div class = 'container'>
<div class="paragraphs">
  <div class="row">
    <div class="span4">
    	{{HTML::image($profile->photoURL, 'profile picture',array('width'=>'100','style'=>'float:right'))}}
      <div class="content-heading"><h3>Welcome, {{$profile->displayName}} </h3></div>
      <p>city: {{$profile->cities->name}}</br>
      gu: {{$profile->gus->name}}-gu</br>
      dong: {{$profile->dongs->name}}-dong</p>
      <p>bio: {{$profile->description}} </p>
    </div>
  </div>
</div>
</div>