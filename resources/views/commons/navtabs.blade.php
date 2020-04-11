<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('aquariums.show', ['id' => $aquarium->id]) }}" class="nav-link {{ Request::is('aquariums/*/show') ? 'active' : '' }}">コメント <span class="badge badge-secondary">{{ $count_aquarium_reviews }}</span></a></li>
    <li class="nav-item"><a href="{{ route('aquariums.recommendations', ['id' => $aquarium->id]) }}" class="nav-link {{ Request::is('aquariums/*/recommendations') ? 'active' : '' }}">おすすめ生物 <span class="badge badge-secondary">{{ $count_aquarium_recommendations }}</span></a></li>
</ul>