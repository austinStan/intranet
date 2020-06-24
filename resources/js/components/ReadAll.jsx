import React from "react";

export default function ReadAll({ title, link }) {
    return (
        <div>
            <div className="read-all">
                <a href={`${link ? link : "#"}`} className="text-center">
                    {title} <span style={{ fontSize: "20px" }}> &#8594;</span>
                </a>
            </div>
        </div>
    );
}
