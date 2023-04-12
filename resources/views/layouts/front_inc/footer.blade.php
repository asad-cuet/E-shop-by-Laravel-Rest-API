<div class="pt-5 text-white navbar-dark bg-dark">
      @php 
      $desc=App\Models\Setting::first()->footer_descript;
      echo html_entity_decode($desc);
      @endphp
</div>

