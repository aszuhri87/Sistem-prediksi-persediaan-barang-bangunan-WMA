<script src="<?php echo base_url('vendors/vuejs/vue.js') ?>"></script>
<script src="<?php echo base_url('vendors/vuejs/axios.min.js') ?>"></script>

<script>
	var app_pb = new Vue({
		el: '#app-pb',
		data() {
			return {
				loading: false,
				barang: [],
				pemasok: [],
				dataForm: {
					kode_pembelian: "PB202104",
					id_pemasok: null,
					total_pembelian: 0,
					barang: [
					{
						id_barang: null,
						jumlah: 1,
						subharga: 0,
					}
					],
				},
			}
		},
		mounted() {
			console.log('vue ready!')
			this.get_barang();
			this.get_pemasok();
			this.get_kode('pembelian');
		},
		// watch: {
		// 	"dataForm.barang": function (data) {
		// 		let jumlah = 0;
		// 		data.forEach((item, index) => {
		// 			jumlah += item.subharga
		// 		})
		// 		this.dataForm.total_pembelian = jumlah;
		// 	}
		// },
		computed: {
			total_pembelian() {
				let jumlah = 0;
				this.dataForm.barang.forEach((item, index) => {
					jumlah += item.subharga
				})
				return jumlah;
			}
		},
		methods: {
			async get_barang() {
				this.barang = await axios.get(`${BASE_URL}api/tampil_barang`)
				.then(response => {
					// console.log(response)
					return response.data.data	
				})
			},
			async get_pemasok() {
				this.pemasok = await axios.get(`${BASE_URL}api/tampil_pemasok`)
				.then(response => {
					// console.log(response)
					return response.data.data	
				})
			},
			async get_kode(tipe) {
				this.dataForm.kode_pembelian = await axios.get(`${BASE_URL}api/ambil_kode/${tipe}`)
				.then(response => {
					return response.data.data	
				})
			},
			add_barang() {
				this.dataForm.barang.push({
					id_barang: null,
					jumlah: 1,
					subharga: 0,
				});
				// console.log(this.dataForm.barang);
			},
			delete_barang(index) {
				if (index > -1) {
					this.dataForm.barang.splice(index, 1);
					this.barang.splice(index, 1);
				}
			},
			calc_subharga(index) {
				let id_barang = this.dataForm.barang[index].id_barang;
				let barang = this.barang.filter(item => item.id_barang == id_barang);
				// console.log('barang', barang);
				let hasil = barang[0].harga_beli_barang * this.dataForm.barang[index].jumlah;
				this.dataForm.barang[index].subharga = hasil;
				// console.log(hasil)
			},
			get_max_stok(index) {
				let id_barang = this.dataForm.barang[index].id_barang;
				// console.log(id_barang);
				if (id_barang) {
					let barang = this.barang.filter(item => item.id_barang == id_barang);
					// console.log('getstok',barang)
					return barang ? barang[0].stok_barang : 0;
				}
				return 0;
			}
		}
	})
</script>