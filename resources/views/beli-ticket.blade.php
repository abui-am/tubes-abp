<x-main-layout>

    <!-- App Content -->
    <main class="p-6 max-w-7xl mx-auto text-white">
        <div class="z-1 absolute top-0 left-0 right-0 bottom-0" style="background: linear-gradient(259.99deg, rgba(0, 0, 0, 0) 9.41%, rgba(0, 0, 0, 0.85) 49.58%, #060608 70.83%);">
        </div>
        <div class="flex gap-6 z-[1] relative mt-44">
            <div class="max-w-xl flex flex-col justify-center">
                <h1 class="text-[40px] font-bold mb-1">
                    {{ $concert['title']}}
                </h1>
                <p class="text-[16px] mb-10">
                    <b> {{ $concert['date']}} </b> • {{ $concert['artists']}} • {{ $concert['city']}}
                </p>

                <p class="text-xs leading-[150%] mb-9">
                    {{ $concert['description']}}
                </p>

            </div>

            <div>

                <div>
                    <h1>
                        Jenis Tiket
                    </h1>
                    <select name="ticket_type" id="ticket_type" class="bg-gray-800 p-4 rounded-lg text-white w-full">
                        <option value="vip">VIP</option>
                        <option value="regular">Regular</option>
                    </select>
                </div>

                <!-- Grid of square from vip_seats -->
                <div id="vip-seats" class="grid grid-cols-4 gap-6 mt-10">
                    @foreach($vip_seats as $vip_seat)
                    <button id="{{ $vip_seat }}-vip" class="bg-gray-800 p-4 rounded-lg text-white font-bold">
                        {{ $vip_seat }}
                    </button>
                    @endforeach

                </div>

                <!-- Grid of square from regular_seats -->
                <div style="display: none;" id="regular-seats" class="grid grid-cols-8 gap-6 mt-10">
                    @foreach($regular_seats as $regular_seat)
                    <button id="{{ $regular_seat }}-regular" class="bg-gray-800 p-4 rounded-lg text-white font-bold">
                        {{ $regular_seat }}
                    </button>
                    @endforeach
                </div>

                <div class="mt-4">
                    <h1>
                        Harga Tiket
                    </h1>
                    <p id="ticket-price" class="text-[16px] font-bold">
                        Rp. 0
                    </p>

                </div>

                <div>
                    <button id="buy-ticket" class="mt-6 bg-gray-800 min-w-[112px] inline-block p-3 text-xs rounded-lg text-white ">Beli Tiket</button>
                </div>
            </div>
    </main>
    </div>
    </body>
    <script>
        const occupiedSeats = <?php echo json_encode($occupied_seats); ?>;
        const concert = <?php echo json_encode($concert); ?>;
        const ticketType = document.getElementById('ticket_type');
        const vipSeats = document.getElementById('vip-seats');
        const regularSeats = document.getElementById('regular-seats');
        let ticketTypeValue = 'vip';
        let seats = [];

        const calculateTotalPrice = () => {
            // Calculate the total price
            const totalPrice = seats.length * +concert['ticket_price_in_rupiah'];

            document.getElementById('ticket-price').innerText = `Rp. ${totalPrice.toLocaleString()}`;
        };
        const user = <?php echo json_encode($user); ?>;
        ticketType.addEventListener('change', (e) => {
            if (e.target.value === 'vip') {
                seats.forEach((seat) => {
                    document.getElementById(`${seat}-regular`).style.backgroundColor = '';
                });
                seats = [];
                vipSeats.style.display = 'grid';
                regularSeats.style.display = 'none';
                ticketTypeValue = 'vip';


            } else {
                seats.forEach((seat) => {
                    document.getElementById(`${seat}-vip`).style.backgroundColor = '';
                });
                seats = [];

                vipSeats.style.display = 'none';
                regularSeats.style.display = 'grid';
                ticketTypeValue = 'regular';



            }
            document.getElementById('ticket-price').innerText = 'Rp. 0';

        });

        // Handle onclick event for each seat
        const vipSeatButtons = document.querySelectorAll('[id$="-vip"]');
        const regularSeatButtons = document.querySelectorAll('[id$="-regular"]');
        vipSeatButtons.forEach((button) => {
            button.addEventListener('click', (e) => {
                const seat = e.target.id.split('-')[0];

                // If the seat is already selected, remove it from the list
                if (seats.includes(seat)) {
                    seats = seats.filter((s) => s !== seat);
                    e.target.style.backgroundColor = '';
                    calculateTotalPrice();

                    return;
                }

                seats.push(seat);
                // Change the background color of the button
                e.target.style.backgroundColor = 'pink';

                calculateTotalPrice();
            });
        });

        regularSeatButtons.forEach((button) => {
            button.addEventListener('click', (e) => {
                const seat = e.target.id.split('-')[0];
                // If the seat is already selected, remove it from the list
                if (seats.includes(seat)) {
                    seats = seats.filter((s) => s !== seat);
                    e.target.style.backgroundColor = '';
                    calculateTotalPrice();

                    return;
                }
                seats.push(seat);
                e.target.style.backgroundColor = 'pink';

                calculateTotalPrice();

            });
        });

        // Handle onclick event for buy ticket button
        const buyTicketButton = document.getElementById('buy-ticket');

        buyTicketButton.addEventListener('click', async () => {
            // seats?.forEach((seat) => {
            //     $.ajax({
            //         url: '/concerts/' + concert['id'] + '/buy-ticket',
            //         type: 'POST',
            //         data: {
            //             concert_id: concert['id'],
            //             seat_no: seat,
            //             seat_type: ticketTypeValue,
            //             user_id: user['id'],
            //         },
            //     });
            // });

            // Multiple ajax request
            const promises = seats.map((seat) => {
                return $.ajax({
                    url: '/api/seats',
                    type: 'POST',
                    data: {
                        concert_id: concert['id'],
                        seat_no: seat,
                        seat_type: ticketTypeValue,
                        user_id: user['id'],
                    },
                });

            });

            await Promise.all(promises);
            alert('Tiket berhasil dibeli');

            // Redirect to dashboard
            window.location.href = '/';

        });
        console.log(occupiedSeats);
        // Disable occupied seats
        occupiedSeats.forEach((seat) => {
            vipEl = document.getElementById(`${seat?.seat_no}-vip`);
            regularEl = document.getElementById(`${seat?.seat_no}-regular`);
            if (vipEl) {
                vipEl.setAttribute('disabled', true);
                vipEl.style.backgroundColor = 'red';
            }
            if (regularEl) {
                regularEl.setAttribute('disabled', true);
                regularEl.style.backgroundColor = 'red';
            }

        });
    </script>

</x-main-layout>