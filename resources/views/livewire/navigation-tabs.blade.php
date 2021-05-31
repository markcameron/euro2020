<div class="flex flex-col h-screen justify-between">

    <header class="h-18 bg-euro-darkest">
        @livewire('navigation-menu')
    </header>

    <main class="overflow-y-auto mb-auto flex-grow bg-gradient-to-b from-euro-darkest to-euro-light" id="scrollable">

        <div wire:loading.flex class="text-white h-96 flex items-center justify-center">
            <svg class="animate-spin -ml-1 mr-3 h-16 w-16 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-30" cx="12" cy="12" r="10" stroke="white" stroke-width="4"></circle>
                <path class="opacity-75" fill="white" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        <main wire:loading.remove>
            @if ($selectedTab === 1)
                <livewire:match-list />
            @elseif ($selectedTab === 2)
                <livewire:predictions-list />
            @elseif ($selectedTab === 3)
                <livewire:leaderboard />
            @endif
        </main>

    </main>

    <footer class="h-22">
        <div class="bg-euro-light text-white">
            <nav class="flex flex-row">

                <x-bottom-nav-item tab="1" :text="__('Matches')" :selectedTab="$selectedTab">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 w-auto mx-auto">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                </x-bottom-nav-item>

                <x-bottom-nav-item tab="2" :text="__('Predictions')" :selectedTab="$selectedTab">
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 w-auto mx-auto">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </x-bottom-nav-item>

                <x-bottom-nav-item tab="3" :text="__('Leaderboard')" :selectedTab="$selectedTab">
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 w-auto mx-auto">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </x-bottom-nav-item>

            </nav>
        </div>
    </footer>

    <script>
        // Remeber scroll position when navigating between match/prediction detail and list
        let div = document.getElementById('scrollable')

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('element.updated', (el, component) => {
                if (component.fingerprint.name === 'navigation-tabs') {
                    localStorage.setItem("scroll-position", 0);
                    div.scrollTop = 0
                }

                if (!['match-list'].includes(component.fingerprint.name)) {
                    return
                }

                setTimeout(() => {
                    if (el.clientHeight !== 0 && localStorage.getItem("scroll-position") != null) {
                        div.scrollTop = parseInt(localStorage.getItem("scroll-position"));
                    }
                }, 250);
            })
        });

        div.onscroll = function (e) {
            if (div.scrollTop !== 0) {
                localStorage.setItem("scroll-position", div.scrollTop);
            }
        }
    </script>
</div>
