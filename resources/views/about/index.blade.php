<x-guest-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">{{ __('About Us') }}</h1>
                <p class="lg:w-full mx-auto leading-relaxed text-justify text-base mt-14">L'asbl Feria d’Art est un marché qui souhaite rendre l’art accessible au plus grand nombre et ce en désacralisant l’achat d’une oeuvre d’art tout en offrant une expérience inclusive pour les artistes et le public. </p>
                <p class="lg:w-full mx-auto leading-relaxed text-justify text-base mt-14">L’une des cinq organisatrices, de retour de quelques semaines passées au coeur du milieu artistique chilien, nous a parlé de petits marchés d’art organisés dans différentes villes du pays. Elle nous a raconté l’engagement (politique, social, etc.) de ces artistes, de leur communauté et des techniques qu’ils emploient afin de rendre leur art accessible à tout public tout en se rémunérant dignement par la vente de celui-ci. </p>
                <p class="lg:w-full mx-auto leading-relaxed text-justify text-base mt-14">C’est lors d’une soirée passée ensemble à Bruxelles en temps de Covid que l’envie presque évidente nous est venue de tenter le coup ici. Certaines d’entre nous sont directement concernées par la difficulté de vendre de l’art lorsque celui-ci ne correspond pas forcément à l’idée que l’on se fait de l’Artiste et nous le sommes à l’unanimité lorsqu’il s’agit de se confronter aux prix d’achat de l’Art. C’est pourquoi, loin de vouloir dévaloriser le travail de l’artiste, nous ouvrons une nouvelle porte pour le dévoiler.</p>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($members as $member)
                <x-member-card :member="$member" />
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>