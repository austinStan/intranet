import React from "react";

export default function FamousEmployeeSlider({ famous_staff }) {
    // console.log(famous_staff[0]);

    return (
        <div>
            <div
                id="carouselExampleCaptions"
                className="carousel slide"
                data-ride="carousel"
            >
                <ol className="carousel-indicators">
                    <li
                        data-target="#carouselExampleCaptions"
                        data-slide-to="0"
                        className="active"
                    ></li>

                    <li
                        data-target="#carouselExampleCaptions"
                        data-slide-to="1"
                    ></li>

                    <li
                        data-target="#carouselExampleCaptions"
                        data-slide-to="2"
                    ></li>
                </ol>

                <div className="carousel-inner">
                    <div className="carousel-item active">
                        <img
                            src={famous_staff[0].image}
                            className="d-block w-100"
                            alt={famous_staff[0].staff_id}
                        />
                        <div className="carousel-caption d-none d-md-block">
                            <h5>Employee Of The {famous_staff[0].duration}</h5>
                            <h4>{famous_staff[0].staff_id}</h4>
                            <p>{famous_staff[0].department_id}</p>
                        </div>
                    </div>

                    <div className="carousel-item">
                        <img
                            src="https://cdn.pixabay.com/photo/2016/11/18/19/07/happy-1836445__340.jpg"
                            className="d-block w-100"
                            alt="..."
                        />

                        <div className="carousel-caption d-none d-md-block">
                            <h5>Employee Of The Month</h5>
                            <h4>Employee Name</h4>
                            <p>Department</p>
                        </div>
                    </div>

                    <div className="carousel-item">
                        <img
                            src="https://cdn.pixabay.com/photo/2017/01/29/21/16/nurse-2019420__340.jpg"
                            className="d-block w-100"
                            alt="..."
                        />

                        <div className="carousel-caption d-none d-md-block">
                            <h5>Employee Of The Year</h5>
                            <h4>Employee Name</h4>
                            <p>Department</p>
                        </div>
                    </div>
                    {/* <h3>No Famous Employees</h3> */}
                </div>

                <a
                    className="carousel-control-prev"
                    href="#carouselExampleCaptions"
                    role="button"
                    data-slide="prev"
                >
                    <span
                        className="carousel-control-prev-icon"
                        aria-hidden="true"
                    ></span>

                    <span className="sr-only">Previous</span>
                </a>

                <a
                    className="carousel-control-next"
                    href="#carouselExampleCaptions"
                    role="button"
                    data-slide="next"
                >
                    <span
                        className="carousel-control-next-icon"
                        aria-hidden="true"
                    ></span>

                    <span className="sr-only">Next</span>
                </a>
            </div>
        </div>
    );
}
