import React from "react";

const Recommendations = props => {
	return (
		<div className="recommendations">
			<div className="card mt-5 grey-text grey-bg">
				<div className="heading px-2 py-2 d-flex justify-content-between">
					<p className="my-0 font-weight-bold">Recommendations</p>
					<i className="fa fa-ellipsis-v" />
				</div>
				<div class="recommendations-list px-4 py-3">
					<div class="recommendation border px-4 py-4 mb-2 d-flex justify-content-between">
						<img
							className="d-block rounded-circle mr-2"
							src="https://res.cloudinary.com/mrphemi/image/upload/v1555763571/15.jpg"
						/>
						<div className="desc">
							<h6 className="font-weight-bold">Dr. Randy</h6>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit.
								Tempora aut consequuntur aperiam laborum, velit vel labore atque
								nobis voluptatum dolorum?{" "}
							</p>
						</div>
					</div>
					<div class="recommendation border px-4 py-4 mb-2 d-flex justify-content-between">
						<img
							className="d-block rounded-circle mr-2"
							src="https://res.cloudinary.com/mrphemi/image/upload/v1555763571/15.jpg"
						/>
						<div className="desc">
							<h6 className="font-weight-bold">Dr. Randy</h6>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit.
								Tempora aut consequuntur aperiam laborum, velit vel labore atque
								nobis voluptatum dolorum?{" "}
							</p>
						</div>
					</div>
					<div class="recommendation border px-4 py-4 mb-2 d-flex justify-content-between">
						<img
							className="d-block rounded-circle mr-2"
							src="https://res.cloudinary.com/mrphemi/image/upload/v1555763571/15.jpg"
						/>
						<div className="desc">
							<h6 className="font-weight-bold">Dr. Randy</h6>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit.
								Tempora aut consequuntur aperiam laborum, velit vel labore atque
								nobis voluptatum dolorum?{" "}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
};

export default Recommendations;
