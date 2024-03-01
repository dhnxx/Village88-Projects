function randomDamage(max) {
	return Math.floor(Math.random() * max + 1);
}
var ninja1 = {
	hp: 100,
	strength: 15,
	attack: function () {
		damage = randomDamage(this.strength);
		ninja2.hp -= damage;
		console.log(
			"Ninja1 attacks Ninja2 and does a damage of " +
				damage +
				"! Ninja 1 Health: " +
				this.hp +
				". Ninja 2 Health: " +
				ninja2.hp
		);
	},
};
var ninja2 = {
	hp: 150,
	strength: 10,
	attack: function () {
		damage = randomDamage(this.strength);
		ninja1.hp -= damage;
		console.log(
			"Ninja2 attacks Ninja1 and does a damage of " +
				damage +
				"! Ninja 1 Health: " +
				ninja1.hp +
				". Ninja 2 Health: " +
				this.hp
		);
	},
};

for (let i = 0; i <= 10; i++) {
	console.log("===Round " + i + "===");
	ninja1.attack();
	ninja2.attack();
}
