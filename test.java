import java.util.HashMap;
import java.util.Map;
// Lớp đại diện cho nút của cây quyết định
class DecisionTreeNode {
    private String attribute;
    private Map<String, DecisionTreeNode> children;
    private String decision;

    public DecisionTreeNode(String attribute) {
        this.attribute = attribute;
        this.children = new HashMap<>();
        this.decision = null;
    }

    // Thêm một nút con
    public void addChild(String attributeValue, DecisionTreeNode child) {
        children.put(attributeValue, child);
    }

    // Thiết lập quyết định cho nút lá
    public void setDecision(String decision) {
        this.decision = decision;
    }

    // Lấy quyết định của nút lá
    public String getDecision() {
        return decision;
    }

    // Lấy thuộc tính của nút
    public String getAttribute() {
        return attribute;
    }

    // Lấy nút con dựa trên giá trị của thuộc tính
    public DecisionTreeNode getChild(String attributeValue) {
        return children.get(attributeValue);
    }
}

// Lớp đại diện cho cây quyết định
class DecisionTree {
    private DecisionTreeNode root;

    public DecisionTree(DecisionTreeNode root) {
        this.root = root;
    }
  

    // Phương thức để dự đoán dựa trên dữ liệu đầu vào
   // Phương thức để dự đoán dựa trên dữ liệu đầu vào
public String predict(Map<String, String> instance) {
    DecisionTreeNode currentNode = root;
    while (currentNode != null && !currentNode.getChildren().isEmpty()) {
        String attributeValue = instance.get(currentNode.getAttribute());
        currentNode = currentNode.getChild(attributeValue);
    }
    if (currentNode != null) {
        return currentNode.getDecision();
    } else {
        // Xử lý trường hợp không tìm thấy quyết định
        return "Unknown";
    }
}

}

public class b {
    public static void main(String[] args) {
        // Xây dựng cây quyết định
        DecisionTreeNode root = new DecisionTreeNode("Outlook");
        DecisionTreeNode sunnyNode = new DecisionTreeNode("Humidity");
        DecisionTreeNode rainyNode = new DecisionTreeNode("Wind");
        DecisionTreeNode windyNode = new DecisionTreeNode("Yes");
        DecisionTreeNode notWindyNode = new DecisionTreeNode("No");

        root.addChild("Sunny", sunnyNode);
        root.addChild("Rainy", rainyNode);
        rainyNode.addChild("Windy", windyNode);
        rainyNode.addChild("NotWindy", notWindyNode);

        // Thiết lập quyết định cho các nút lá
        sunnyNode.setDecision("Yes");
        windyNode.setDecision("Yes");
        notWindyNode.setDecision("No");

        // Tạo cây quyết định từ nút gốc
        DecisionTree decisionTree = new DecisionTree(root);

        // Dự đoán dựa trên dữ liệu đầu vào
        Map<String, String> instance = new HashMap<>();
        instance.put("Outlook", "Rainy");
        instance.put("Wind", "Windy");

        String prediction = decisionTree.predict(instance);
        System.out.println("Prediction: " + prediction);
    }
}