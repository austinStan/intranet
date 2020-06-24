import React from "react";

export default function Banner({ title }) {
    return (
        <div className="banner">
            <div className="container">
                <h1 className="" style={{ color: "white" }}>
                    {title ? title : ""}
                </h1>
            </div>
        </div>
    );
}
