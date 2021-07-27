<x-guest-layout>
    <section class="container p-4 mx-auto text-gray-600 body-font">
        <div class="flex flex-col text-center w-full mb-4">
            <h1 class="sm:text-4xl text-3xl font-medium title-font uppercase mb-4 text-purple-700 tracking-widest">{{ __('About Us') }}</h1>
            <p class="text-xl lg:w-full mx-auto leading-relaxed text-justify text-base mb-4">L'asbl Feria d’Art est un marché qui souhaite rendre l’art accessible au plus grand nombre et ce en désacralisant l’achat d’une oeuvre d’art tout en offrant une expérience inclusive pour les artistes et le public. </p>
            <p class="text-xl lg:w-full mx-auto leading-relaxed text-justify text-base mb-4">L’une des cinq organisatrices, de retour de quelques semaines passées au coeur du milieu artistique chilien, nous a parlé de petits marchés d’art organisés dans différentes villes du pays. Elle nous a raconté l’engagement (politique, social, etc.) de ces artistes, de leur communauté et des techniques qu’ils emploient afin de rendre leur art accessible à tout public tout en se rémunérant dignement par la vente de celui-ci. </p>
            <p class="text-xl lg:w-full mx-auto leading-relaxed text-justify text-base mb-4">C’est lors d’une soirée passée ensemble à Bruxelles en temps de Covid que l’envie presque évidente nous est venue de tenter le coup ici. Certaines d’entre nous sont directement concernées par la difficulté de vendre de l’art lorsque celui-ci ne correspond pas forcément à l’idée que l’on se fait de l’Artiste et nous le sommes à l’unanimité lorsqu’il s’agit de se confronter aux prix d’achat de l’Art. C’est pourquoi, loin de vouloir dévaloriser le travail de l’artiste, nous ouvrons une nouvelle porte pour le dévoiler.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach ($members as $member)
            <x-member-card :member="$member" />
            @endforeach
        </div>
    </section>
</x-guest-layout>