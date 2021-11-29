<script src="<?php echo base_url('vendors/vuejs/vue.js') ?>"></script>
<script src="<?php echo base_url('vendors/vuejs/axios.min.js') ?>"></script>

<script>
	var app_pj = new Vue({
		el: '#app-pj',
		data() {
			return {
				loading: false,
				barang: [],
				dataForm: {
					kode_penjualan: "PJ202104",
					nama_pembeli: "Umum",
					total_penjualan: 0,
					barang: [
					{
						id_barang: null,
						id_barang_stok: null,
						jumlah: 1,
						subharga: 0,
					}
					],
				},
			}
		},
		mounted() {
			console.log('vue ready!')
			this.get_barang_stok();
			this.get_kode('penjualan');
		},
		// watch: {
		// 	"dataForm.barang": function (data) {
		// 		let jumlah = 0;
		// 		data.forEach((item, index) => {
		// 			jumlah += item.subharga
		// 		})
		// 		this.dataForm.total_penjualan = jumlah;
		// 	}
		// },
		computed: {
			total_penjualan() {
				let jumlah = 0;
				this.dataForm.barang.forEach((item, index) => {
					jumlah += item.subharga
				})
				return jumlah;
			}
		},
		methods: {
			async get_barang_stok() {
				this.barang = await axios.get(`${BASE_URL}api/tampil_barang_stok`)
				.then(response => {
					// console.log(response)
					return response.data.data	
				})
			},
			async get_kode(tipe) {
				this.dataForm.kode_penjualan = await axios.get(`${BASE_URL}api/ambil_kode/${tipe}`)
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
				let id_barang_stok = this.dataForm.barang[index].id_barang_stok;
				let barang = this.barang.filter(item => item.id_barang_stok == id_barang_stok);
				// console.log('barang', barang);
				let hasil = barang[0].harga_jual_barang * this.dataForm.barang[index].jumlah;
				this.dataForm.barang[index].id_barang = barang[0].id_barang;
				this.dataForm.barang[index].subharga = hasil;
				// console.log(hasil)
			},
			get_max_stok(index) {
				let id_barang_stok = this.dataForm.barang[index].id_barang_stok;
				// console.log(id_barang_stok);
				if (id_barang_stok) {
					let barang = this.barang.filter(item => item.id_barang_stok == id_barang_stok);
					// console.log('getstok', barang)
					return barang ? barang[0].stok : 0;
				}
				return 0;
			}
		}
	})
</script>