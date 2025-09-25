/********************************************************************
 * メモ
 * ******************************************************************
 * 地下鉄など電波の届かない場所(オフライン)での利用を想定している。
 * フロントエンドでの処理が多いため、ライブラリを用いない純粋なJavaScriptでの実装
 * Safariブラウザでoptionタグを非表示にできないので、
 * オブジェクトを再生成する方法を採用
 *********************************************************************/

document.addEventListener("DOMContentLoaded", () => {
    /**************************************************
     * 画面表示時
     **************************************************/
    // 初期データ配列格納
    const originalPrefectureList = Object.values(window.prefectureData) || [];
    const originalGymList = Object.values(window.gymData) || [];
    const originalCourseList = Object.values(window.courses) || [];

    // 選択肢の要素を取得
    const prefectureSelect = document.querySelector("#prefecture_select");
    const gymSelect = document.querySelector("#gym_select");
    const courseLevelSelect = document.querySelector("#course_level");
    const courseList = document.querySelector(".course-list-container");
    const noCoursesMessage = document.querySelector(".no-courses-message");

    // 検索欄の要素を取得
    const prefectureInput = document.querySelector(".prefecture_input");
    const gymInput = document.querySelector(".gym_input");


    /**************************************************
     * イベントリスナー
     **************************************************/

    // 都道府県の検索欄(input)に文字が入力された場合は選択肢をフィルタリング
    prefectureInput.addEventListener("input", () => {
        filterSelectOptionsByInput(
            originalPrefectureList,
            prefectureInput,
            prefectureSelect
        );
    });

    // ジムの検索欄(input)に文字が入力された場合は選択肢をフィルタリング
    gymInput.addEventListener("input", () => {
        filterSelectOptionsByInput(
            originalGymList,
            gymInput,
            gymSelect
        );
    });

    // 都道府県の選択肢(select)が変更された場合
    prefectureSelect.addEventListener("change", () => {
        filterGymOptionsByPrefectureId();
        filterCourses();
    });

    // ジムの選択肢(select)が変更された場合は講座一覧をフィルタリング
    gymSelect.addEventListener("change", () => {
        filterCourses();
    });

    // 講座レベルの選択肢(select)が変更された場合は講座一覧をフィルタリング
    courseLevelSelect.addEventListener("change", () => {
        filterCourses();
    });


    /**************************************************
     * 関数
     **************************************************/

    /**
     * 選択肢を検索文字でフィルタリングする関数
     * 
     * @param {Array} initialList.      初期選択肢 リスト
     * @param {HTMLElement} inputElem   検索input オブジェクト
     * @param {HTMLElement} selectElem  選択肢select オブジェクト
    */
    function filterSelectOptionsByInput(
        initialList,
        inputElem,
        selectElem
    )
    {
        // 検索キーワードを取得
        const keyword = inputElem.value.trim();

        // 配列をLike検索してコピーを作成
        const filtered = keyword === ""
            ? initialList
            : initialList.filter(
                item => item.name.toLowerCase().includes(keyword)
            );

        // selectのoptionを再描画
        selectElem.innerHTML = '<option value="">---</option>';
        filtered.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.name;
            selectElem.appendChild(option);
        });
    }

    /**
     * ジムの選択肢を都道府県IDでフィルタリングする関数
     */
    function filterGymOptionsByPrefectureId()
    {
        // 選択されている都道府県のIDを取得
        const selectedPrefectureId = prefectureSelect.value;

        if (selectedPrefectureId === "") {
            gymSelect.innerHTML = '<option value="">---</option>';
            originalGymList.forEach(gym => {
                const option = document.createElement('option');
                option.value = gym.id;
                option.textContent = gym.name;
                gymSelect.appendChild(option);
            });
            console.log('aaaa');
            return;
        }
        // 都道府県IDが一致するジムのみを抽出してselectのoptionを再描画
        const filteredGyms = originalGymList.filter(gym => gym.state_id == selectedPrefectureId);
        gymSelect.innerHTML = '<option value="">---</option>';
        filteredGyms.forEach(gym => {
            const option = document.createElement('option');
            option.value = gym.id;
            option.textContent = gym.name;
            gymSelect.appendChild(option);
        });
    }

    /**
     * 講座一覧をフィルタリングする関数
     * 
     * 検索フィールドにて選択したジム、都道府県、講座レベルに基づいて
     * 講座一覧をフィルタリングします。
     */
    function filterCourses()
    {
        const selectedGymId = gymSelect.value;
        const selectedPrefectureId = prefectureSelect.value;
        const selectedCourseLevelId = courseLevelSelect.value;

        // 検索条件に一致する講座を抽出
        const filteredCourses = originalCourseList.filter(course => {
            return (
                (selectedGymId === "" || course.gym.id == selectedGymId) &&
                (selectedPrefectureId === "" || course.gym.state_id == selectedPrefectureId) &&
                (selectedCourseLevelId === "" || course.level == selectedCourseLevelId)
            );
        });

        // 講座一覧を再生成
        renderCourseList(filteredCourses);
    }

    /**
     * 講座一覧を再生成する関数
     *
     * @param {Array} courses - 講座データの配列
     */
    function renderCourseList(courses)
    {
        const courseListContainer = document.querySelector(".course-list-container tbody");
        courseListContainer.innerHTML = ""; // 一旦クリア
        
        if (courses.length === 0) {
            // 検索内容に一致するデータが空の場合は表を非表示にしてメッセージ表示
            courseList.style.display = "none";
            noCoursesMessage.style.display = "block";
            return;
        }  else {
            // 表を表示し、該当なしメッセージを非表示にする
            courseList.style.display = "block";
            noCoursesMessage.style.display = "none";
        }

        // 表を再生成
        courses.forEach(course => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td class="center">${course.id}</td>
                <td class="center">${course.name}</td>
                <td class="center">${course.level_name}</td>
                <td class="center">${course.gym.name}</td>
                <td>${course.outline}</td>
            `;
            courseListContainer.appendChild(row);
        });
    }
});
